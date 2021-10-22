<?php include_once 'templates/header.php'; ?>

<!-- Begin bread crumbs -->
<nav class="bread-crumbs">
   <div class="container">
      <div class="row">
         <div class="col-12">
            <ul class="bread-crumbs-list">
               <li>
                  <a href="<?= baseUrl(''); ?>">Home</a>
                  <i class="material-icons md-18">chevron_right</i>
               </li>
               <li><a href="#!">Daftar Mitra</a></li>
            </ul>
         </div>
      </div>
   </div>
</nav>
<!-- End bread crumbs -->

<div class="section">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="section-heading heading-center">
					<h1>Daftar Mitra Kami</h1>
				</div>
				<div class="content">
					<p>Welcome to our wonderful world. We sincerely hope that each and every user entering our website will find
						exactly what he/she is looking for. With advanced features of activating account and new login widgets,
						you will definitely have a great experience of using our web page.
					</p>
						
					<h4>Testimoni</h4>
					<blockquote>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante. Lorem ipsum
							dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante. Lorem ipsum dolor sit
							amet, consectetur adipiscing elit. Integer posuere erat a ante. Lorem ipsum dolor sit amet,
							consectetur adipiscing elit. Integer posuere erat a ante.</p>
						<footer>Oleh PT. Telkom Indonesia Tbk</footer>
					</blockquote>
					
					<br>
					<table>
						<thead>
							<tr>
								<th>#</th>
								<th>Mitra</th>
							</tr>
						</thead>
						<tbody>
						    <?php 
						    $no = 1;
						    foreach($mitra_kami as $mitra) : ?>
							<tr>
								<td><?= $no++ ?></td>
								<td><?= $mitra['mitra'] ?></td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
					<br>
				</div>
			</div>
			
			<?php foreach($mitra_kami as $mitra) : ?>
             <div class="col-lg-3 col-md-4 col-sm-4 col-6 item">
                <!-- Begin brands item -->
                <div class="brands-item item-style">
                   <img data-src="admin-page/assets/img/mitra/<?= $mitra['logo']; ?>" class="lazy" src="admin-page/assets/img/mitra/<?= $mitra['logo']; ?>" alt="" />
                </div>
                <!-- End brands item -->
             </div>
             <?php endforeach; ?>
             
		</div>
	</div>
</div>

<?php include_once 'templates/footer.php'; ?>