<?php

use CodeIgniter\HTTP\RedirectResponse;

function createOk($msg = 'Created successfully!', $routeName = null): RedirectResponse {
    return goWithSuccess($msg, $routeName);
}
function createFail($msg = 'Creation Failed!', $routeName = null): RedirectResponse {
    return goWithError($msg, $routeName);
}
function updateOk($msg = 'Update successful!', $routeName = null): RedirectResponse {
    return goWithSuccess($msg, $routeName);
}
function updateFail($msg = 'Update failed!', $routeName = null): RedirectResponse {
    return goWithError($msg, $routeName);
}
function deleteOk($routeName = null): RedirectResponse {
    return goWithSuccess("Delete Successful!", $routeName);
}


function goWithSuccess($msg, $to = null): RedirectResponse {
    $route = $to ? redirect($to) : redirect()->back();

    return $route->with("toast_success", $msg);
}
function goWithError($msg = "Error...! ☹", $to = null): RedirectResponse {
    $route = $to ? redirect($to) : redirect()->back();

    return $route->with("toast_error", $msg);
}

function toastError($serverError, $clientMessage): RedirectResponse {
    log_message('error', '[ERROR] {exception}', ['exception' => $serverError]);

    return redirect()->back()->withInput()
        ->with('toast_error', $clientMessage);
}