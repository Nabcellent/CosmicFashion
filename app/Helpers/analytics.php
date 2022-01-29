<?php

use Carbon\Carbon;
use Illuminate\Support\Collection;
use JetBrains\PhpStorm\ArrayShape;

/**
 *  ===========================================================================    CHARTS / ANALYTICS
 */
function chartDateFormat($date, $frequency = 'daily'): string {
    return match ($frequency) {
        'monthly' => Carbon::parse($date)->format('Y-m'),
        'weekly' => Carbon::parse($date)->format('W'),
        default => Carbon::parse($date)->toDateString()
    };
}

/**
 * @throws Exception
 */
function chartStartDate($frequency): Carbon {
    return match ($frequency) {
        'monthly' => now()->subMonths(3),
        'weekly' => now()->subWeeks(4),
        default => now()->subWeek()
    };
}

/**
 * @param Collection $models
 * @param string     $frequency
 * @return array
 * @throws Exception
 */
#[ArrayShape(['labels' => "array", 'datasets' => "array"])]
function chartDataSet(Collection $models, string $frequency = 'daily' | 'weekly' | 'monthly'): array {
    $frequency = $frequency ?? 'daily';

    $freqCount = match ($frequency) {
        'weekly' => 4,
        'monthly' => 3,
        default => 7
    };

    $date = new Carbon;

    $data = collect();
    for($i = 0; $i < $freqCount; $i++) {
        $dateString = chartDateFormat($date, $frequency);

        $data[$dateString] = isset($models[$dateString]) ? $models[$dateString]->count() : 0;

        switch($freqCount) {
            case 4: $date->subWeek();
                break;
            case 3: $date->subMonth();
                break;
            default: $date->subDay();
        }
    }

    $data = $data->sortKeys();

    foreach($data as $key => $value) {
        $date = $frequency === 'weekly' ? Carbon::now()->setISODate(now()->year, $key) : Carbon::parse($key);

        $name = getLabelName($date, $frequency);

        $data[$name] = $value;
        $data->forget($key);
    }

    return [
        'labels' => $data->keys()->toArray(),
        'datasets' => $data->values()->toArray()
    ];
}

function getLabelName($date, $frequency) {
    if($frequency === 'monthly') {
        if($date->isCurrentMonth()) {
            $name = 'This month';
        } else if ($date->isLastMonth()) {
            $name = 'Last month';
        } else {
            $name = $date->shortMonthName;
        }
    } else if($frequency === 'weekly') {
        if($date->isCurrentWeek()) {
            $name = 'This week';
        } else if($date->isLastWeek()) {
            $name = 'Last week';
        } else {
            $name = "{$date->diffInWeeks()} week" . ($date->diffInWeeks() > 1 ? 's' : '') . " ago";
        }
    } else {
        if($date->isCurrentDay()) {
            $name = 'Today';
        } else if($date->isYesterday()) {
            $name = 'Yesterday';
        } else {
            $name = $date->shortDayName;
        }
    }

    return $name;
}