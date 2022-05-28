<div class="modal" id="modalProduct">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Editar Producto</h2>
            </div>
            <div class="modal-body">
                <form action="../controllers/headsetsController.php" method="POST">
                <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="id" value="" id="form-edit-id">
                    <label for="titulo">Titulo:</label>
                    <br>
                    <textarea id="form-edit-titulo" name="titulo" required></textarea>
                    <br>
                    <label for="feature1">Caracteristíca 1:</label>
                    <br>
                    <textarea id="form-edit-feature1" name="feature1" required></textarea>
                    <br>
                    <label for="feature2">Caracteristíca 2:</label>
                    <br>
                    <textarea id="form-edit-feature2" name="feature2" required></textarea>
                    <br>
                    <label for="feature3">Caracteristíca 3:</label>
                    <br>
                    <textarea id="form-edit-feature3" name="feature3" required></textarea>
                    <br>
                    <label for="price">Precio:</label>
                    <br>
                    <textarea id="form-edit-price" name="price" required></textarea>
                    <br>
                    <!-- <label for="image">Imagen:</label>
                    <br>
                    <textarea id="form-edit-image" name="image" required></textarea>
                    <br>
                    <label for="href">Href:</label>
                    <br>
                    <textarea id="form-edit-href" name="href" required></textarea>
                    <br> -->
                    <input type="submit" value="Guardar" onclick="window.localStorage.clear();">
                </form>
            </div>
        </div>
    </div>
</div>