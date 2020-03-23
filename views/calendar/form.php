<div class="form-row mt-3">
    <div class="form-group col-md-10">
        <label for="title">Nom de l'événement</label>
        <input type="text" class="form-control" id="title" name="title" required value="<?= isset($data['title']) ? h($data['title']) : '' ?>">
        <?php if (isset($errors['title'])): ?>
            <small class="form-text text-muted"><?= $errors['title']; ?></small>
        <?php endif; ?>
    </div>
    <div class="form-group col-md-2">
        <label for="date">Date</label>
        <input type="date" class="form-control" id="date" name="date" required value="<?= isset($data['date']) ? h($data['date']) : '' ?>">
        <?php if (isset($errors['date'])): ?>
            <small class="form-text text-muted"><?= $errors['date']; ?></small>
        <?php endif; ?>
    </div>
    <div class="form-group col-md-2 ">
        <label for="start">Heude de début</label>
        <input type="time" class="form-control" id="start" name="start" placeholder="HH:MM" required value="<?= isset($data['start']) ? h($data['start']) : '' ?>">
        <?php if (isset($errors['start'])): ?>
            <small class="form-text text-muted"><?= $errors['start']; ?></small>
        <?php endif; ?>
    </div>
    <div class="form-group col-md-2">
        <label for="end">Heure de fin</label>
        <input type="time" class="form-control" id="end" name="end" placeholder="HH:MM" required value="<?= isset($data['end']) ? h($data['end']) : '' ?>">
    </div>
    <div class="form-group col-md-8">
        <label for="url">Lien FaceBook</label>
        <input type="text" class="form-control" id="url" name="url" required value="<?= isset($data['url']) ? h($data['url']) : '' ?>">
    </div>
</div>
<div class="row mt-2">
    <div class="col">
    <label for="content">Description</label>
        <textarea name="content" class="form-control" id="content"><?= isset($data['content']) ? h($data['content']) : '' ?></textarea>
    </div>
</div>
