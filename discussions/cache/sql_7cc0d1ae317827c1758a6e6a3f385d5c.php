<?php exit; ?>
1482899353
SELECT m.*, u.user_colour, g.group_colour, g.group_type FROM (bb3_moderator_cache m) LEFT JOIN bb3_users u ON (m.user_id = u.user_id) LEFT JOIN bb3_groups g ON (m.group_id = g.group_id) WHERE m.display_on_index = 1
6
a:0:{}