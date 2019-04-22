<h2><?php echo $posts['title']; ?></h2>
<small class="post-date">
    Posted on: <?php echo $posts['created_at'];?>
</small><br>
<img class="post-thumb" src="<?php echo site_url(); ?>assets/images/posts/<?php echo $posts['post_image']; ?>">
<div class="post-body">
    <?php echo $posts['body']; ?>
</div>

<?php if($this->session->userdata('user_id') == $posts['user_id']) : ?>
    <hr>
    <a class="btn btn-default pull-left"
    href="<?php echo base_url(); ?>posts/edit/<?php echo $posts['slug']; ?>" >Edit</a>
    <?php echo form_open('posts/delete/'.$posts['id']); ?>
        <input type="submit" value="Delete" class="btn btn-danger">
    </form>
<?php endif; ?>
<hr>
<h3>Comments</h3>
<?php if($comments) : ?>
    <?php foreach($comments as $comment) : ?>
        <div class="well">
            <h5><?php echo $comment['message']; ?> [by <strong><?php echo $comment['name']; ?>]</strong></h5>
        </div>
    <?php endforeach; ?>
<?php else : ?>
    <p>No Comments To Display!</p>
<?php endif; ?>
<hr>
<h3>Add Comment</h3>
<?php echo validation_errors(); ?>
<?php echo form_open('comments/create/'.$posts['id']); ?>
    <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control">
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="text" name="email" class="form-control">
    </div>
    <div class="form-group">
        <label>Message</label>
        <textarea name="message" class="form-control" cols="30" rows="10"></textarea>
    </div>
    <input type="hidden" name="slug" value="<?php echo $posts['slug']; ?>">
    <button class="btn btn-primary" type="submit">Submit</button>
</form>