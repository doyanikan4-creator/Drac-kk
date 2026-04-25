document.getElementById('formPenarikan').addEventListener('submit', function(e) {
  const nominal = document.querySelector('[name="nominal"]').value;
  if (parseInt(nominal) < 20000) {
    e.preventDefault();
    alert('Nominal penarikan minimal Rp20.000');
  }
});
