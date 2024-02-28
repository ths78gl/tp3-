</div>
<div id="modalsuppression" class="modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmation de suppression</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Voulez-vous supprimer cette nationalité ?</p>
            </div>
            <div class="modal-footer">
                <a href="supprimernationalite.php?num=" class="btn btn-primary" id="btnsuppr">Supprimer</a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Ne pas supprimer</button>
            </div>
        </div>
    </div>
</div>
</div>

<div id="modalsuppression" class="modal fade" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirmation de suppression</h5>
      </div>
      <div class="modal-body">
        <p>Voulez-vous supprimer ce genre ? </p>
      </div>
      <div class="modal-footer">
        <a href="supprimerGenre.php?num=" class="btn btn-primary" id="btnsuppr">Supprimer</a>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Ne pas supprimer</button>
      </div>
    </div>
  </div>
</div>

<footer class="container">
    <p>© tp3 thomas</p>
</footer>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/e50145753c.js" crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        $("a[data-suppression]").click(function () {
            var lien = $(this).attr("data-suppression");
            var message = $(this).attr("data-message");
            $("#btnsuppr").attr("href", lien);
            $(".modal-body").text(message);
        });
    });
</script>
</body>
</html>
