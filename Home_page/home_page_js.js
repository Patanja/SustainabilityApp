window.addEventListener('scroll', function() {
  const welcomeSection = document.querySelector('.welcome-section');
  
  // Ensure the element exists
  if (welcomeSection) {
    const scrollPercentage = window.scrollY / (document.documentElement.scrollHeight - window.innerHeight);
    
    // Add the fade-out class when the scroll percentage reaches 50%
    if (scrollPercentage > 0.1) {
      welcomeSection.classList.add('fade-out');
    } else {
      welcomeSection.classList.remove('fade-out');
    }
  }
});