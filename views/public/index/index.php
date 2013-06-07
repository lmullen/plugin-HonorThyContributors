<?php echo head(); ?>

<div id="primary">

  <?php 

  echo "<h1>" . get_option('honor_thy_contributors_page_title') . "</h1>";

  echo "<p>" . get_option('honor_thy_contributors_pre_text') . "</p>";

  ?> 
  <table>
    <tr>
      <th>Name</th>
      <th>Records contributed</th>
    </tr>
    <?php
    $db = get_db();

    $sql = "
    SELECT `text`, COUNT(`text`)
    FROM `omeka_element_texts`
    WHERE `element_id` = 37
    GROUP BY `text`";

    $contributors = $db->query($sql)->fetchall();
    foreach ($contributors as $contributor) {
      echo "<tr>";
      echo "<td>" . $contributor['text'] . "</td>";
      echo "<td>" . $contributor['COUNT(`text`)'] . "</td>";
      echo "</tr>";
    }
    ?>
  </table>

  <?php echo "<p>" . get_option('honor_thy_contributors_post_text') . "</p>"; ?>

</div>

<?php echo foot(); ?>
