<rss version="2.0">
   <channel>
      <title>DLES feed</title>
      <link><?php echo base_url(); ?></link>
      <description>Distributed Lecturing and Examination System</description>
      <language>en-us</language>
      <pubDate><?php echo date('D, d M Y H:i:s T');?></pubDate>
      <lastBuildDate><?php echo date('D, d M Y H:i:s T'); ?></lastBuildDate>
      <docs><?php echo base_url(); ?>index.php/feed/rss</docs>
      <generator>DLES RSS editor</generator>
      <managingEditor>DLES Automated</managingEditor>
      <webMaster>admin@dles.com</webMaster>
<?php foreach ($data->result() as $datum): ?>
      <item>
          <title><?php echo $datum->title;?></title>
          <link><?php echo $datum->link;?></link>
          <description><?php echo $datum->content;?></description>
      </item>
<?php endforeach ?>
   </channel>
</rss>