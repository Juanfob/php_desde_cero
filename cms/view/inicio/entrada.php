<img data-content="<?php echo htmlspecialchars($this->Attach->Descripcion); ?>" src="<?php echo $this->BaseUrl('uploads/' . $this->Attach->Imagen); ?>" class="img-thumbnail" />
<p class="well well-sm"><?php echo $this->Attach->Descripcion; ?></p>
<?php echo $this->Attach->Contenido; ?>