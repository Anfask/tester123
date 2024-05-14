let header = document.querySelector("header");

window.addEventListener("scroll", function () {
  header.classList.toggle("sticky", window.scrollY > 60);
});

let menu = document.querySelector('#menu-icon');
let navbar = document.querySelector('.navbar');

menu.onclick = () => {
  menu.classList.toggle('bx-x');
  navbar.classList.toggle('open');
}

// Load header and footer
window.onload = function() {
  let header = document.querySelector("header");
  let footer = document.getElementById("footer");

  if (header === null) {
    console.error("Header element not found!");
    return; // Exit the function early if header is not found
  }

  // Event listener for sticky header
  window.addEventListener("scroll", function () {
    header.classList.toggle("sticky", window.scrollY > 60);
  });

  window.onloadTurnstileCallback = function () {
    turnstile.render('#example-container', {
        sitekey: '0x4AAAAAAAZTdnnsr6cJ8Gl4',
        callback: function(token) {
            console.log(`Challenge Success ${token}`);
        },
    });
};

  // Access properties or methods of header here
  header.innerHTML === null;
  
  // Load footer
  if (footer !== null) {
    footer.innerHTML = `
      <div class="footer-content">
          <p>&copy; ${new Date().getFullYear()} Khan Productions. All rights reserved.</p>
      </div>
    `;
  }
};
