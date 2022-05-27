<div class="modal" id="modalText">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Editar Opinión</h2>
            </div>
            <div class="modal-body">
                <form action="../controllers/opinionsController.php" method="POST">
                <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="id" value="" id="form-edit-id">
                    <label for="text">Texto opinión:</label>
                    <br>
                    <textarea id="form-edit-texto" name="text"></textarea>
                    <input type="submit" value="Guardar">
                </form>
            </div>
        </div>
    </div>
</div>