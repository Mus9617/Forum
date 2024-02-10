$(document).ready(function() {
    let progressBar = $('.progress-bar');
    let progressValue = 0;
    let interval = setInterval(increaseProgress, 50);
  
    function increaseProgress() {
      progressValue += 1;
      progressBar.css('width', progressValue + '%').attr('aria-valuenow', progressValue);
      $('.persentase').text(progressValue + '%');
      if (progressValue >= 100) {
        clearInterval(interval);
        $(".preloader").fadeOut("slow", function() {
        
          window.location.href = 'admin/blog.php';
        });
      }
    }
  });
  