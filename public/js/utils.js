// Used to set current date on inputs type date.

let dateNow = "{{ date('Y-m-d'); }}"

function setCurrentDate(idDate) {
    document.getElementById(idDate).value = dateNow;
}
