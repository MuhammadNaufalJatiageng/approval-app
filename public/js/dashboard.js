// MODAL
const myModal = document.getElementById('modalcreate')
const myInput = document.getElementById('deskripsi')

myModal.addEventListener('shown.bs.modal', () => {
  myInput.focus()
})
// END MODAL

// ALERT TIMER
const alert = document.querySelectorAll('.alert');

if (alert) {
    window.setTimeout(() => {
        document.querySelector('.alert-close').click()
    }, 9500)
}
// END ALERT TIMER