<h6>Ingredients</h6>
<ol class="card-text">
  <?php foreach(explode(',', $pizza['ingredients']) as $ingredient): ?>
    <li><?php echo htmlspecialchars($ingredient); ?></li>
  <?php endforeach; ?>
</ol>