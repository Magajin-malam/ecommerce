<footer class="section-p1">
    <div class="col">
        <h4>Contact</h4>
        <p>
            <strong>Address: </strong> Street 5, Sardauna Estate Katsina

        </p>
        <p>
            <strong>Phone: </strong> +2347067129511
        </p>
    </div>
    <div class="copyright">
        <p>&copy; Al-Qalam University Katsina </p>
    </div>
</footer>

<script src="script.js"></script>
<script>
window.addEventListener("onunload", function() {
    // Call a PHP script to log out the user
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "logout.php", false);
    xhr.send();
});
</script>
</body>
</html>