let wizardInit = function wizardInit() {
    let wizards = document.querySelectorAll('.theme-wizard');
    let tabPillEl = document.querySelectorAll('#pill-tab2 [data-bs-toggle="pill"]');
    let tabProgressBar = document.querySelector('.theme-wizard .progress');
    wizards.forEach(function (wizard) {
        let tabToggleButtonEl = wizard.querySelectorAll('[data-wizard-step]');
        let form = wizard.querySelector('form');
        let submitBtn = form.querySelector('button[type="submit"]')
        let nextButton = wizard.querySelector('.next button');
        let prevButton = wizard.querySelector('.previous button');
        let cardFooter = wizard.querySelector('.theme-wizard .card-footer');
        let count = 0;

        prevButton.classList.add('d-none'); // on button click tab change

        nextButton.addEventListener('click', function () {
            if ($('.tab-pane.active').find($(':input')).valid()) {
                count += 1;
                let tab = new window.bootstrap.Tab(tabToggleButtonEl[count]);
                tab.show();
            }
            /*if (!form.className.includes('was-validated') && form.className.includes('needs-validation')) {
                form.classList.add('was-validated');
            } else {
                count += 1;
                let tab = new window.bootstrap.Tab(tabToggleButtonEl[count]);
                tab.show();
            }*/
        });
        prevButton.addEventListener('click', function () {
            count -= 1;
            let tab = new window.bootstrap.Tab(tabToggleButtonEl[count]);
            tab.show();
        });

        if (tabToggleButtonEl.length) {
            tabToggleButtonEl.forEach(function (item, index) {
                item.addEventListener('show.bs.tab', function (e) {
                    if (!form.className.includes('was-validated') && form.className.includes('needs-validation')) {
                        e.preventDefault();
                        form.classList.add('was-validated');
                        return null;
                    }

                    count = index; // can't go back tab

                    if (count === tabToggleButtonEl.length - 1) {
                        tabToggleButtonEl.forEach(function (tab) {
                            tab.setAttribute('data-bs-toggle', 'modal');
                            tab.setAttribute('data-bs-target', '#error-modal');
                        });
                    } //add done class


                    for (let i = 0; i < count; i += 1) {
                        tabToggleButtonEl[i].classList.add('done');
                    } //remove done class


                    for (let j = count; j < tabToggleButtonEl.length; j += 1) {
                        tabToggleButtonEl[j].classList.remove('done');
                    } // card footer remove at last step


                    if (count > tabToggleButtonEl.length - 2) {
                        item.classList.add('done');
                        cardFooter.classList.add('d-none');
                    } else {
                        cardFooter.classList.remove('d-none');
                    } // prev-button removing


                    if (count > 0) {
                        prevButton.classList.remove('d-none');
                    } else {
                        prevButton.classList.add('d-none');
                    }
                });
            });
        }
    });

    // control wizard progressbar
    if (tabPillEl.length) {
        let dividedProgressbar = 100 / tabPillEl.length;
        tabProgressBar.querySelector('.progress-bar').style.width = "".concat(dividedProgressbar, "%");
        tabPillEl.forEach(function (item, index) {
            item.addEventListener('show.bs.tab', function () {
                tabProgressBar.querySelector('.progress-bar').style.width = "".concat(dividedProgressbar * (index + 1), "%");
            });
        });
    }
};