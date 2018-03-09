<div>
    <?php if (isset($tasks) && !empty($tasks)) : ?>
        <table>
            <?php foreach ($tasks as $task) : ?>
                <tr>
                    <td><?= $task->getName(); ?></td>
                    <td><?= $task->getStatus()->getLabel(); ?></td>
                    <td><a href="#" class="btn-remove" data-id="<?= $task->getId(); ?>">DELETE</a></td>
                    <td><a href="#" data-id="<?= $task->getId(); ?>">DONE</a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</div>