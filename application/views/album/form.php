
<h1>Reward Level</h1>
<div class="row">
  <div class="col-md-8">
    <?php echo form_open('album/get_reward_level'); ?>

    <div class="form-group">
      <?php
        $data= array(
        'name' => 'history_spent',
        'placeholder' => 'How much money you spent historically',
        'class' => 'form-control'
        );
        echo form_input($data);
      ?>
    </div>

    <div class="form-group">
      <?php
        $data= array(
        'name' => 'recent_transaction',
        'placeholder' => 'How much you spent on your recent transaction',
        'class' => 'form-control'
        );
        echo form_input($data);
      ?>
    </div>




    <div id="form_button">
      <?php
      $data = array(
      'type' => 'submit',
      'value'=> 'Submit',
      'class'=> 'submit'
      );
      echo form_submit($data); ?>
    </div>

    <?php echo form_close();?>
  </div>
</div>
