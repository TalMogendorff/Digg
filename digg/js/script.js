document
  .getElementById("delete-post-btn")
  .addEventListener("click", function (e) {
    if (confirm("Are you sure you want to delete this post?")) {
      return true;
    } else {
      e.preventDefault();
    }
  });
