<footer>
    <div class="copyrights absolute bottom-0 right-0 left-0 text-center">

        <p>&copy; <?= date('Y') ?></p>

    </div>
</footer>

<!-- SCRIPTS -->

<script>
    function toggleMenu() {
        var menuItems = document.getElementsByClassName('menu-item');
        for (var i = 0; i < menuItems.length; i++) {
            var menuItem = menuItems[i];
            menuItem.classList.toggle("hidden");
        }
    }
</script>

<!-- -->

</body>
</html>