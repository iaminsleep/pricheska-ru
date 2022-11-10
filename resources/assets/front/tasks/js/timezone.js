const setTimezone = function() {
  const timezone = moment.tz.guess();
  document.cookie="timezone=" + timezone + ";path=/;max-age=31536000";
};

document.addEventListener("DOMContentLoaded", setTimezone);