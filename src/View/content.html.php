<?php if (isset($tasks) && !empty($tasks)) : ?>
    <?php $task_left = null; ?>
    <?php $task_completed = null; ?>
    <?php foreach ($tasks as $task) : ?>
        <!-- -->
        <?php $completed = false; ?>
        <?php if ($task->getStatus()->getId() == NOT_STARTED) : ?>
            <?php $task_left++; ?>
        <?php elseif ($task->getStatus()->getId() == COMPLETED) : ?>
            <?php $completed = true; ?>
            <?php $task_completed++; ?>
        <?php endif; ?>

        <!-- -->
        <li class="todo-item <?php if ($completed): ?> todo-done <?php endif; ?> "
            data-todo-id="<?= $task->getId(); ?>">
            <div class="todo-view">
                <input type="checkbox" class="todo-checkbox"
                    <?php if ($completed) : ?>
                        checked
                    <?php endif; ?>
                >
                <span class="todo-content" tabindex="0"><?= $task->getName(); ?></span>
            </div>

            <div class="todo-edit">
                <input type="text" class="todo-input" value="<?= $task->getName(); ?>">
            </div>

            <a href="#" class="todo-remove" title="Remove this task">
                <span class="todo-remove-icon"></span>
            </a>
        </li>
    <?php endforeach; ?>

    <?php if (!empty($task_left) || !empty($task_completed)) : ?>
        <div id="todo-stats">
            <?php if (!empty($task_left)) : ?>
                <span class="todo-count">
                    <span class="todo-remaining"><?= $task_left; ?></span>
                    <span class="todo-remaining-label">task</span> left.
                </span>
            <?php endif; ?>
            <?php if (!empty($task_completed)) : ?>
                <a href="#" class="todo-clear">
                    Clear <span class="todo-done"><?= $task_completed; ?></span>
                    completed <span class="todo-done-label">task</span>
                </a>
            <?php endif; ?>
        </div>
    <?php endif; ?>
<?php endif; ?>


