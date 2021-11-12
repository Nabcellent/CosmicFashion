function oopsError(title = 'Oops...', message = 'Something went wrong') {
    return Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: message,
    })
}

function errorAlert(message) {
    Swal.fire({
        icon: 'error',
        title: 'Error!',
        text: message,
    })
}

function showLoader(message = null) {
    if (message !== null) {
        $('loader button').html(message);
    }

    $('loader.wait').show(300);
}

function hideLoader() {
    $('loader.wait').hide(500);
}

$(() => {
    AOS.init({
        delay: 20,
        duration: 700,
        once: true,
        mirror: true,
        anchorPlacement: 'top-bottom',
    });
})

function uniqid(prefix, moreEntropy) {
    //   example 1: var $id = uniqid()
    //   example 1: var $result = $id.length === 13
    //   returns 1: true
    //   example 2: var $id = uniqid('foo')
    //   example 2: var $result = $id.length === (13 + 'foo'.length)
    //   returns 2: true
    //   example 3: var $id = uniqid('bar', true)
    //   example 3: var $result = $id.length === (23 + 'bar'.length)
    //   returns 3: true
    if (typeof prefix === 'undefined') {
        prefix = ''
    }

    let retId
    const _formatSeed = function (seed, reqWidth) {
        seed = parseInt(seed, 10).toString(16) // to hex str
        if (reqWidth < seed.length) {
            // so long we split
            return seed.slice(seed.length - reqWidth)
        }
        if (reqWidth > seed.length) {
            // so short we pad
            return Array(1 + (reqWidth - seed.length)).join('0') + seed
        }
        return seed
    }

    const $global = (typeof window !== 'undefined' ? window : global)
    $global.$locutus = $global.$locutus || {}
    const $locutus = $global.$locutus
    $locutus.php = $locutus.php || {}

    if (!$locutus.php.uniqidSeed) {
        // init seed with big random int
        $locutus.php.uniqidSeed = Math.floor(Math.random() * 0x75bcd15)
    }

    $locutus.php.uniqidSeed++

    // start with prefix, add current milliseconds hex string
    retId = prefix
    retId += _formatSeed(parseInt(new Date().getTime() / 1000, 10), 8)
    retId += _formatSeed($locutus.php.uniqidSeed, 5)    // add seed hex string

    if (moreEntropy) {
        // for more entropy we add a float lower to 10
        retId += (Math.random() * 10).toFixed(8).toString()
    }
    return retId
}