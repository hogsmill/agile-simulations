
function post(data, message) {
  var ok = true
  for (var key in data) {
    data[key] = data[key].trim()
    if (!data[key] || 0 === data[key].length) {
      ok = false
    }
  }
  if (!ok) {
    alert('Please complete all fields')
  } else {
    $.ajax({
        type: 'GET',
        url: "./mail.php",
        data: data,
        success: function(i) {
          alert(message)
        }
    })
  }
}

function login() {
  var href = encodeURIComponent(window.location.href)
  window.location.href = "/login.html?" + href
}
