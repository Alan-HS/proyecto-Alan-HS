<div class="modal" id="modalProduct">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Editar Producto</h2>
            </div>
            <div class="modal-body">
                <form action="../controllers/lightstickController.php" method="POST">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="id" value="" id="form-edit-id">
                    <textarea id="form-edit-titulo" name="titulo"></textarea>
                    <textarea id="form-edit-feature1" name="feature1"></textarea>
                    <textarea id="form-edit-feature2" name="feature2"></textarea>
                    <textarea id="form-edit-feature3" name="feature3"></textarea>
                    <textarea id="form-edit-price" name="price"></textarea>
                    <textarea id="form-edit-image" name="image"></textarea>
                    <textarea id="form-edit-href" name="href"></textarea>
                    <input type="submit" value="Guardar">
                </form>
            </div>
        </div>
    </div>
</div>