function updateTime() {
    let now = new Date();
    let hours = now.getHours();
    let minutes = now.getMinutes();
    let seconds = now.getSeconds();
    let day = now.getDate();
    let month = now.getMonth() + 1;
    let year = now.getFullYear();
  
    hours = hours < 10 ? '0' + hours : hours;
    minutes = minutes < 10 ? '0' + minutes : minutes;
    seconds = seconds < 10 ? '0' + seconds : seconds;
    month = month < 10 ? '0' + month : month;
  
    let timeString = hours + ':' + minutes + ':' + seconds;
    let dateString = day + '.' + month + '.' + year;
  
    document.querySelector('.time').textContent = timeString;
    document.querySelector('.date').textContent = dateString;
  }
  
  setInterval(updateTime, 1000);
  