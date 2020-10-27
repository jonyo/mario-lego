'use strict';

(() => {
    const type = document.querySelector('[generator-type]');
    if (!type) {
        return;
    }

    /**
     * Hide the element and disable any child inputs
     * @param {HTMLElement} element
     */
    const hide = element => {
        element.classList.add('hide');
        element.querySelectorAll('input').forEach(input => input.disabled = true);
    };

    /**
     * Show the element and un-disable any child inputs
     * @param {HTMLElement} element
     */
    const show = element => {
        element.classList.remove('hide');
        element.querySelectorAll('input').forEach(input => input.disabled = false);
    };


    /**
     * Update the checked state of the all checkbox
     * @param {HTMLElement} all - the all checkbox
     * @param {HTMLElement[]} checkboxes
     */
    const updateAllCheckbox = (all, checkboxes) => {
        let checked = true;
        checkboxes.forEach(element => {
            if (!element.checked) {
                checked = false;
            }
        })
        all.checked = checked;
    };

    const sections = document.querySelectorAll('[generator-type-section]');
    const namedCheckboxAll = document.querySelector('[named-checkbox-all]');
    const namedCheckboxes = document.querySelectorAll('[named-checkbox]');

    type.addEventListener('change', () => {
        sections.forEach(section => {
            if (section.getAttribute('data-type') === type.value) {
                show(section);
            } else {
                hide(section);
            }
        });
    });
    type.dispatchEvent(new Event('change'));

    namedCheckboxAll.addEventListener('change', () => {
        namedCheckboxes.forEach(element => element.checked = namedCheckboxAll.checked);
    });
    namedCheckboxes.forEach(element => {
        element.addEventListener('change', () => {
            updateAllCheckbox(namedCheckboxAll, namedCheckboxes);
        });
    });
})();
