<?php echo head(); ?>

<div id="primary">

  <h1>Contributors</h1>

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

</div>

<?php echo foot(); ?>
