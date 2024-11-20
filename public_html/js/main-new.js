// // Home Banner API
// const apiHomeUrl = 'https://physiofitnessrajkot.com/api/home-banner';

// fetch(apiHomeUrl)
//   .then(response => response.json())
//   .then(data => {
//     // Get the title, description, and image URL
//     const title = data[0].title;
//     const description = data[0].description;
//     const imageUrl = `https://physiofitnessrajkot.com/${data[0].image}`;

//     // Set the title and description
//     document.getElementById('title').innerText = title;
//     document.getElementById('description').innerText = description;

//     // Set the background image of the banner
//     document.getElementById('banner').style.backgroundImage = `url('${imageUrl}')`;
//   })
//   .catch(error => console.error('Error fetching data:', error));

// // Team member API
//   const apiTeamMemberUrl = 'https://physiofitnessrajkot.com/api/team-member';

//   fetch(apiTeamMemberUrl)
//   .then(response => response.json())
//   .then(data => {
//     const name = data[0].name;
//     const designation = data[0].designation;
//     const description = data[0].description;
//     const memberImg = data[0].image
//         // Set the name, designation and description
//         document.getElementById('name').innerText = name;
//         document.getElementById('designation').innerText = designation;
//         document.getElementById('description').innerText = description;
//         document.getElementById('memberImg').style.backgroundImage = `url('${memberImg}')`;
//   })

// document.addEventListener("DOMContentLoaded", function () {
//   AOS.init();
// });
function openModal(modalId) {
    var modal = new bootstrap.Modal(document.getElementById(modalId), {
      keyboard: false // Disable closing with Escape key
    });
    modal.show();
  }

  
$(document).ready(function(){
  $("#firstCarousel").owlCarousel({
    items: 4, // Show 3.5 items by default
    loop: true, // Enable loop
    nav: false, // Enable navigation buttons
    dots: true, // Enable dots
    autoplay: true, // Enable autoplay
    autoplayTimeout: 3000, // Set autoplay timeout to 5 seconds
    responsive: {
      0: {
        items: 1 // 1 item on small screens
      },
      600: {
        items: 1 // 2 items on medium screens
      },
      1000: {
        items: 1 // 3.5 items on large screens
      }
    }
  });
});

  $(document).ready(function(){
    $("#carouselExample").owlCarousel({
      items: 4, // Show 3.5 items by default
      margin: 20, // Space between items
      loop: true, // Enable loop
      nav: false, // Enable navigation buttons
      dots: true, // Enable dots
      autoplay: true, // Enable autoplay
      autoplayTimeout: 3000, // Set autoplay timeout to 5 seconds
      responsive: {
        0: {
          items: 1 // 1 item on small screens
        },
        600: {
          items: 1 // 2 items on medium screens
        },
        1000: {
          items: 4 // 3.5 items on large screens
        }
      }
    });
  });

  $(document).ready(function(){
    $("#testimonialCarousel").owlCarousel({
      items: 1, // Show 3.5 items by default
      margin: 20, // Space between items
      loop: true, // Enable loop
      nav: true, // Enable navigation buttons
      navText: [
        '<img src="assets/images/prev.png" alt="prev">', // Custom left arrow image
        '<img src="assets/images/next.png" alt="next">' // Custom right arrow image
      ],
      dots: false, // Enable dots
      // autoplay: true, // Enable autoplay
      autoplayTimeout: 3000, // Set autoplay timeout to 5 seconds
      responsive: {
        0: {
          items: 1 // 1 item on small screens
        },
        600: {
          items: 1 // 2 items on medium screens
        },
        1000: {
          items: 1 // 3.5 items on large screens
        }
      }
    });
  });

// 
$(document).ready(function(){
  $("#tipsCarousel").owlCarousel({
    items: 4, // Show 3.5 items by default
    margin: 20, // Space between items
    loop: true, // Enable loop
    nav: false, // Enable navigation buttons
    dots: true, // Enable dots
    autoplay: true, // Enable autoplay
    autoplayTimeout: 3000, // Set autoplay timeout to 5 seconds
    responsive: {
      0: {
        items: 1 // 1 item on small screens
      },
      600: {
        items: 1 // 2 items on medium screens
      },
      1000: {
        items: 2.5 // 3.5 items on large screens
      },
      1600: {
        items: 3 // 3.5 items on large screens
      }
    }
  });
});

$(document).ready(function(){
  $("#drCarousel").owlCarousel({
    items: 4, // Show 3.5 items by default
    margin: 20, // Space between items
    loop: true, // Enable loop
    nav: false, // Enable navigation buttons
    dots: true, // Enable dots
    autoplay: true, // Enable autoplay
    autoplayTimeout: 3000, // Set autoplay timeout to 5 seconds
    responsive: {
      0: {
        items: 1 // 1 item on small screens
      },
      600: {
        items: 1 // 2 items on medium screens
      },
      1000: {
        items: 4 // 3.5 items on large screens
      }
    }
  });
});
const counters = document.querySelectorAll('.count-no');
let counterStarted = false;

const startCounters = () => {
  counters.forEach(counter => {
    const target = +counter.getAttribute('data-target');
    const start = +counter.getAttribute('data-start') || 0;
    const increment = (target - start) / 100;
    let count = start;

    // Determine the suffix to display
    let suffix = '';
    if (counter.getAttribute('data-target') == '95') {
      suffix = '%'; // for reduction in pain, append %
    } else if (counter.getAttribute('data-target') == '600') {
      suffix = '+'; // for satisfied patients, append +
    } else if (counter.getAttribute('data-target') != '600') {
      suffix = '+'; // for years of excellence and qualified doctors, append +
    }

    // Set the counter with suffix initially
    counter.textContent = start + suffix;

    const updateCounter = () => {
      count += increment;
      if (count < target) {
        counter.textContent = Math.ceil(count) + suffix; // Update with suffix
        setTimeout(updateCounter, 10);
      } else {
        counter.textContent = target + suffix; // Final value with suffix
      }
    };

    updateCounter();
  });
};

// Using Intersection Observer to trigger the animation when the section is in view
const observer = new IntersectionObserver(entries => {
  if (entries[0].isIntersecting && !counterStarted) {
    startCounters();
    counterStarted = true;
  }
});

observer.observe(document.getElementById('counter-section'));


document.addEventListener('DOMContentLoaded', function () {
  // Select all video elements
  const videos = document.querySelectorAll('.video');
  
  // Loop through each video and apply the same functionality
  videos.forEach(function(video) {
    const playPauseBtn = video.nextElementSibling.querySelector('.playPauseBtn');
  
    playPauseBtn.addEventListener('click', function () {
      if (video.paused) {
        video.play();
        playPauseBtn.innerHTML = `<img src="assets/images/pause.png" alt="Pause" class="play-icon">`;
      } else {
        video.pause();
        playPauseBtn.innerHTML = `<img src="assets/images/play.png" alt="Play" class="play-icon">`;
      }
    });
  
    video.addEventListener('play', function () {
      playPauseBtn.style.opacity = '0';
    });
  
    video.addEventListener('pause', function () {
      playPauseBtn.style.opacity = '1';
    });
  });
});

  
  // document.addEventListener('DOMContentLoaded', function () {
  //   const video = document.getElementById('testiVideo');
  //   const playPauseBtn = document.getElementById('playPauseBtnTesti');
  
  //   playPauseBtn.addEventListener('click', function () {
  //     if (video.paused) {
  //       video.play();
  //       playPauseBtn.innerHTML = `<img src="assets/images/pause.png" alt="Pause" class="play-icon">`; 
  //     } else {
  //       video.pause();
  //       playPauseBtn.innerHTML = `<img src="assets/images/play.png" alt="Play" class="play-icon">`; 
  //     }
  //   });
  
  //   video.addEventListener('play', function () {
  //     playPauseBtn.style.opacity = '0';  
  //   });
  
  //   video.addEventListener('pause', function () {
  //     playPauseBtn.style.opacity = '1';  
  //   });
  // });

  function closeModalAndScroll() {
    // Close the modal
    const modal = document.querySelector('.modal.show');
    if (modal) {
      const modalInstance = bootstrap.Modal.getInstance(modal); // For Bootstrap 5
      modalInstance.hide();
    }

    // Scroll to the #contact section
    document.querySelector('#contact').scrollIntoView({
      behavior: 'smooth'
    });
  }