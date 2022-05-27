<div class="modal" id="modalDeleteText">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Eliminar Opinión</h2>
            </div>
            <div class="modal-body">
                <form action="../controllers/opinionsController.php" method="POST">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="id" value="" id="form-delete-id">
                    <p>¿Seguro que desea eliminar esta opinión?</p>
                    <input type="submit" value="Aceptar" onclick="window.localStorage.clear();">
                </form>
            </div>
        </div>
    </div>
</div>