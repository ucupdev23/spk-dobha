<!-- <div class="simple-footer">
    Copyright &copy; Putri
</div> -->
</div>
</div>
</div>
</section>
</div>

<!-- General JS Scripts -->
<script src="assets/modules/jquery.min.js"></script>
<script src="assets/modules/popper.js"></script>
<script src="assets/modules/tooltip.js"></script>
<script src="assets/modules/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
<script src="assets/modules/moment.min.js"></script>
<script src="assets/js/stisla.js"></script>

<!-- JS Libraies -->

<!-- Page Specific JS File -->

<!-- Template JS File -->
<script src="assets/js/scripts.js"></script>
<script src="assets/js/custom.js"></script>
<script type="text/javascript">
    function change() {
        var x = document.getElementById('password').type;

        if (x == 'password') {
            document.getElementById('password').type = 'text';
            document.getElementById('eye').innerHTML = '<i class="fa-solid fa-eye-slash"></i>';
        } else {
            document.getElementById('password').type = 'password';
            document.getElementById('eye').innerHTML = '<i class="fa-solid fa-eye"></i>';
        }
    }
</script>
</body>

</html>