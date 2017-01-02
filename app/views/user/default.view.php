<div class="app_content_wrapper">
    <div class="window">
        <a class="side_icon" href="/user"><i class="fa fa-user"></i></a>
        <header class="purple">
            <h1><i class="fa fa-user"></i> <?= $text_main_header ?></h1>
        </header>
        <form class="appForm" method="post" enctype="multipart/form-data">
            <div class="table_container">
                <a href="<?= ($this->session->u->privilege == 1) ? '/user/add' : 'javascript:;' ?>" class="button no_margin"><i class="fa fa-plus"></i>
                    <?= $text_new_button ?></a>
                <?php if($this->session->u->privilege == 2): ?>
                <ul class="user_types">
                    <li>
                        <a href="/user/addsupervisor" class="button"><i class="fa fa-user"></i> <?= $text_privilege_school_supervisor ?></a>
                    </li>
                    <li>
                        <a href="/user/addteacher" class="button"><i class="fa fa-user"></i> <?= $text_privilege_school_teacher ?></a>
                    </li>
                    <li>
                        <a href="/user/addparent" class="button"><i class="fa fa-user"></i> <?= $text_privilege_parent ?></a>
                    </li>
                </ul>
                <?php endif; ?>
                <div class="statTable">
                    <table class="tablesorter">
                        <thead>
                        <tr>
                            <th><?= $text_table_name; ?></th>
                            <th><?= $text_table_joindate; ?></th>
                            <th><?= $text_table_privilege; ?></th>
                            <th><?= $text_table_school_name ?></th>
                            <th style="width: 80px"><?= $text_table_status; ?></th>
                            <th style="width: 100px"><?= $text_table_control; ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if ($users !== false) {
                            $dictionary = $this->_registry->lang->get('user|add');
                            foreach ($users as $user) {
                                ?>
                                <tr>
                                    <td><?= $user->ucname; ?></td>
                                    <td><?= $user->joined; ?></td>
                                    <td><?= $user->getPrivilege($dictionary) ?></td>
                                    <td><?= $user->schoolName ?></td>
                                    <td style="width: 80px"><?= $user->getStatus($dictionary) ?></td>
                                    <td>
                                        <a title="<?= $text_table_control_view ?>" href="/user/view/<?= $user->id ?>"><i
                                                class="fa fa-eye"></i></a>
                                        <a href="/user/edit/<?= $user->id ?>" title="<?= $text_table_control_edit ?>"><i
                                                class="fa fa-edit"></i></a>
                                        <a title="<?= $text_table_control_delete ?>"
                                           href="/user/delete/<?= $user->id ?>/?token=<?= $this->_registry->session->CSRFToken ?>"
                                           onclick="if(!confirm('<?= $text_table_control_delete_confirm ?>')) return false;"><i
                                                class="fa fa-trash"></i></a>
                                        <a title="<?= $text_table_control_reset ?>"
                                           href="/user/resetpassword/<?= $user->id ?>/?token=<?= $this->_registry->session->CSRFToken ?>"
                                           onclick="if(!confirm('<?= $text_table_control_reset_confirm ?>')) return false;"><i
                                                class="fa fa-key"></i></a>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    </div>
</div>