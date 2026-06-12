HTML
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hervina Collections</title>

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght=300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>

  <style>
    *{
      margin:0;
      padding:0;
      box-sizing:border-box;
      scroll-behavior:smooth;
    }

    body{
      font-family:'Poppins', sans-serif;
      background:#fff9f6;
      overflow-x:hidden;
      color:#5f4335;
    }

    body::before{
      content:"";
      position:fixed;
      width:100%;
      height:100%;
      background-image: radial-gradient(#f0ddd2 1px, transparent 1px);
      background-size:30px 30px;
      opacity:0.5;
      z-index:-1;
    }

    /* NAVBAR */
    .navbar{
      width:100%;
      padding:18px 8%;
      display:flex;
      justify-content:space-between;
      align-items:center;
      position:fixed;
      top:0;
      z-index:1000;
      background:rgba(255,255,255,0.75);
      backdrop-filter:blur(15px);
      border-bottom:1px solid rgba(0,0,0,0.05);
    }

    .logo{
      font-size:30px;
      font-weight:700;
      letter-spacing:2px;
      color:#6e4d3d;
    }

    .menu a{
      text-decoration:none;
      margin-left:35px;
      color:#6e4d3d;
      font-weight:500;
      position:relative;
      transition:0.3s;
    }

    .menu a:hover{ color:#d8a892; }

    .menu a::after{
      content:"";
      position:absolute;
      left:0;
      bottom:-6px;
      width:0%;
      height:2px;
      background:#d8a892;
      transition:0.3s;
    }

    .menu a:hover::after{ width:100%; }

    section{
      min-height:100vh;
      padding:120px 8%;
    }

    /* HERO */
    .hero{
      display:flex;
      justify-content:center;
      align-items:center;
      gap:80px;
      flex-wrap:wrap;
    }

    .hero-text{ max-width:560px; }

    .tag{
      display:inline-block;
      padding:10px 22px;
      background:#f6e3d8;
      border-radius:30px;
      font-size:14px;
      color:#9a7561;
      margin-bottom:25px;
    }

    .hero-text h1{
      font-size:70px;
      line-height:1.1;
      margin-bottom:25px;
      color:#5f4335;
    }

    .hero-text p{
      line-height:2;
      color:#7d6257;
      margin-bottom:35px;
      font-size:17px;
    }

    .buttons{
      display:flex;
      gap:18px;
      flex-wrap:wrap;
    }

    .btn{
      padding:15px 35px;
      border-radius:40px;
      text-decoration:none;
      font-weight:600;
      transition:0.3s;
      display:inline-block;
    }

    .btn-main{
      background:#d8a892;
      color:white;
      box-shadow:0 8px 20px rgba(216,168,146,0.4);
    }

    .btn-main:hover{
      transform:translateY(-5px);
      background:#be8b74;
    }

    .btn-second{
      border:2px solid #d8a892;
      color:#9a7561;
    }

    .btn-second:hover{ background:#f6e3d8; }

    .hero-image{ position:relative; }

    .blob{
      width:430px;
      height:430px;
      background:#f3ddd1;
      border-radius:55% 45% 60% 40%;
      position:absolute;
      top:-20px;
      left:-20px;
      z-index:-1;
      animation:blob 8s infinite linear;
    }

    @keyframes blob{
      0%{ border-radius:55% 45% 60% 40%; }
      50%{ border-radius:40% 60% 45% 55%; }
      100%{ border-radius:55% 45% 60% 40%; }
    }

    .hero-image img{
      width:380px;
      border-radius:35px;
      box-shadow:0 20px 40px rgba(0,0,0,0.12);
    }

    /* FEATURES */
    .features{
      margin-top:80px;
      display:grid;
      grid-template-columns:repeat(auto-fit,minmax(240px,1fr));
      gap:25px;
    }

    .feature-card{
      background:white;
      padding:35px;
      border-radius:30px;
      text-align:center;
      box-shadow:0 10px 30px rgba(0,0,0,0.06);
      transition:0.4s;
    }

    .feature-card:hover{ transform:translateY(-10px); }
    .feature-card i{ font-size:35px; color:#d8a892; margin-bottom:18px; }
    .feature-card h3{ margin-bottom:12px; }
    .feature-card p{ color:#7d6257; line-height:1.8; font-size:14px; }

    /* TITLE */
    .title{ text-align:center; font-size:55px; margin-bottom:15px; }
    .subtitle{ text-align:center; max-width:700px; margin:auto; color:#7d6257; line-height:2; margin-bottom:70px; }

    /* PRODUCTS */
    .products{
      display:grid;
      grid-template-columns:repeat(auto-fit,minmax(280px,1fr));
      gap:35px;
    }

    .product-card{
      background:white;
      border-radius:35px;
      overflow:hidden;
      box-shadow:0 12px 35px rgba(0,0,0,0.06);
      transition:0.4s;
      position:relative;
    }

    .product-card:hover{ transform:translateY(-12px); }
    .product-card img{ width:100%; height:360px; object-fit:cover; }

    .sale{
      position:absolute;
      top:18px;
      left:18px;
      background:#d8a892;
      color:white;
      padding:8px 15px;
      border-radius:30px;
      font-size:13px;
      font-weight:600;
    }

    .product-content{ padding:28px; text-align:center; }
    .product-content h3{ margin-bottom:10px; font-size:25px; }
    .product-content p{ color:#7d6257; line-height:1.8; font-size:14px; margin-bottom:18px; }
    .price{ font-size:24px; color:#d8a892; font-weight:700; margin-bottom:20px; }

    /* CONTACT BOX (FORM & GAMBAR) */
    .contact-box{
      background:white;
      border-radius:40px;
      overflow:hidden;
      display:flex;
      align-items: center; 
      justify-content: space-between;
      box-shadow:0 12px 35px rgba(0,0,0,0.06);
      max-width: 1000px;
      margin: 0 auto 40px;
    }

    .contact-image{ 
      flex: 1;
      max-width: 400px;
      padding: 30px;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    
    .contact-image img{ 
      width: 100%;
      height: 590px; 
      border-radius:25px; 
      object-fit:cover; 
    }
    
    .contact-form{ 
      flex:1.2;        
      padding:60px 60px 60px 30px; 
    }
    
    .contact-form h2{ font-size:45px; margin-bottom:20px; }
    .contact-form p{ color:#7d6257; line-height:1.9; margin-bottom:30px; }

    .contact-form input,
    .contact-form textarea{
      width:100%;
      padding:16px;
      margin-bottom:18px;
      border:none;
      background:#f7f4f2;
      border-radius:18px;
      outline:none;
      font-size:15px;
      font-family: 'Poppins', sans-serif;
    }

    .contact-form button{
      width:100%;
      padding:16px;
      border:none;
      background:#d8a892;
      color:white;
      border-radius:40px;
      font-size:16px;
      font-weight:600;
      cursor:pointer;
      transition:0.3s;
    }

    .contact-form button:hover{ background:#be8b74; }
    
    /* MAP OUTSIDE BOX */
    .map-outer-box {
      background: white;
      border-radius: 40px;
      padding: 35px;
      max-width: 1000px;
      margin: 0 auto;
      box-shadow: 0 12px 35px rgba(0,0,0,0.06);
    }

    .map-container {
      width: 100%;
      height: 350px; 
      border-radius: 25px;
      overflow: hidden;
      margin-bottom: 25px;
      box-shadow: inset 0 0 10px rgba(0,0,0,0.05);
    }
    .map-container iframe {
      width: 100%;
      height: 100%;
      border: 0;
    }

    .store-info{ background:#f8eee8; padding:25px; border-radius:25px; }
    .store-info h3{ margin-bottom:8px; color:#6e4d3d; font-size:20px; }
    .store-info p{ line-height:1.8; color:#7d6257; font-size:15px; }

    /* FOOTER */
    footer{ padding:40px 8%; background:#f5e3d8; text-align:center; margin-top: 60px; }
    footer p{ color:#7d6257; }

    @media(max-width:900px){
      .navbar{ flex-direction:column; gap:15px; }
      .hero{ flex-direction:column; text-align:center; }
      .hero-text h1{ font-size:48px; }
      .buttons{ justify-content:center; }
      .hero-image img{ width:300px; }
      .blob{ width:320px; height:320px; }
      .contact-box{ flex-direction:column; padding: 20px; }
      .contact-image{ max-width: 100%; padding: 10px; }
      .contact-image img { height: 350px; }
      .contact-form{ padding: 25px 15px; }
      .map-outer-box { padding: 20px; border-radius: 30px; }
      .map-container { height: 250px; border-radius: 18px; }
      .title{ font-size:40px; }
    }
  </style>
</head>
<body>

  <div class="navbar">
    <div class="logo">HERVINA</div>
    <div class="menu">
      <a href="#home">Home</a>
      <a href="#collection">Collection</a>
      <a href="#contact">Contact</a>
      <a href="{{ route('jilbabs.index') }}" target="_blank"><i class="fa-solid fa-user-gear"></i> Admin</a>
    </div>
  </div>

  <section id="home">
    <div class="hero">
      <div class="hero-text">
        <div class="tag">✨ Elegant Muslim Fashion</div>
        <h1>Hervina Collections</h1>
        <p>
          Koleksi jilbab aesthetic dengan desain modern, warna soft elegant, dan material premium untuk muslimah yang ingin tampil stylish setiap hari.
        </p>
        <div class="buttons">
          <a href="#collection" class="btn btn-main">Explore Collection</a>
          <a href="#contact" class="btn btn-second">Contact Us</a>
        </div>
      </div>
      <div class="hero-image">
        <div class="blob"></div>
        <img src="{{ asset('images/model.jpg') }}" alt="Model Utama">
      </div>
    </div>

    <div class="features">
      <div class="feature-card">
        <i class="fa-solid fa-star"></i>
        <h3>Premium Quality</h3>
        <p>Bahan adem dan nyaman dipakai seharian.</p>
      </div>
      <div class="feature-card">
        <i class="fa-solid fa-heart"></i>
        <h3>Aesthetic Style</h3>
        <p>Desain classy dengan warna nude modern.</p>
      </div>
      <div class="feature-card">
        <i class="fa-solid fa-truck-fast"></i>
        <h3>Fast Delivery</h3>
        <p>Pengiriman cepat dan aman ke seluruh Indonesia.</p>
      </div>
    </div>
  </section>

  <section id="collection">
    <h1 class="title">Our Collections</h1>
    <p class="subtitle">Temukan berbagai koleksi jilbab aesthetic dengan kualitas premium, warna elegant, dan model modern.</p>

    <div class="products">
      @forelse ($jilbabs as $jilbab)
        <div class="product-card">
          <div class="sale">Stok: {{ $jilbab->stock }}</div>
          <img src="{{ $jilbab->image }}" alt="{{ $jilbab->title }}">
          <div class="product-content">
            <h3>{{ $jilbab->title }}</h3>
            <p>{!! Str::limit($jilbab->description, 80) !!}</p>
            <div class="price">{{ "Rp " . number_format($jilbab->price, 0, ',', '.') }}</div>
            <a href="#contact" class="btn btn-main" onclick="fillProductField('{{ $jilbab->title }}')">Buy Now</a>
          </div>
        </div>
      @empty
        <div class="col-md-12 text-center" style="grid-column: 1 / -1; padding: 40px;">
            <p style="color: #7d6257; font-style: italic;">Koleksi produk sedang diperbarui, nantikan ya! ✨</p>
        </div>
      @endforelse
    </div>
  </section>

  <section id="contact">
    <h1 class="title">Contact Us</h1>
    <p class="subtitle">Hubungi kami untuk pemesanan dan informasi lebih lanjut ✨</p>

    <div class="contact-box">
      <div class="contact-image">
        <img src="{{ asset('images/model 2.jpg') }}" alt="Model Kontak">
      </div>

      <div class="contact-form">
        <h2>Send Message</h2>
        <p>Kami siap membantu kebutuhan fashion muslimahmu.</p>

        <form onsubmit="redirectToWhatsApp(event)">
          <input type="text" id="cust-name" placeholder="Nama Lengkap" required>
          <input type="text" id="cust-whatsapp" placeholder="Nomor WhatsApp Anda" required>
          <input type="email" id="cust-email" placeholder="Alamat Email Anda" required>
          <textarea id="cust-address" rows="3" placeholder="Alamat Lengkap Pembeli (RT/RW, Kec, Kota, Provinsi)" required></textarea>
          <textarea id="message-box" rows="4" placeholder="Tulis pesan atau detail orderan kamu..." required></textarea>

          <button type="submit">Kirim Via WhatsApp <i class="fa-brands fa-whatsapp"></i></button>
        </form>
      </div>
    </div>

    <div class="map-container">
  <iframe 
    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.5471490947707!2d107.91572917589255!3d-6.824838666755403!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68d124806a0669%3A0x63cd2d5867cd130!2sJl.%20Arief%20Rahman%20Hakim%20No.59%2C%20Situ%2C%20Kec.%20Sumedang%20Utara%2C%20Kabupaten%20Sumedang%2C%20Jawa%20Barat%2045323!5e0!3m2!1sid!2sid!4v1718200000000!5m2!1sid!2sid" 
    allowfullscreen="" 
    loading="lazy" 
    referrerpolicy="no-referrer-when-downgrade">
  </iframe>
</div>

      <div class="store-info">
        <h3>📍 Store Location</h3>
        <p>Hervina Collections — JL Arief Rakhman Hakim No. 59 Sumedang, Kecamatan Sumedang Utara, Kabupaten Sumedang, Jawa Barat<p>
    </div>
  </section>

  <footer>
    <p>© 2026 HERVINA COLLECTIONS • All Rights Reserved</p>
  </footer>

  <script>
    function fillProductField(productName) {
      const messageBox = document.getElementById('message-box');
      messageBox.value = "Halo Kak Hervina, saya berminat untuk memesan produk Jilbab: [" + productName + "]. Mohon infokan detail ketersediaan dan cara pembayarannya ya, terima kasih! ✨";
    }

    function redirectToWhatsApp(event) {
      event.preventDefault();
      const name = document.getElementById('cust-name').value;
      const phone = document.getElementById('cust-whatsapp').value;
      const email = document.getElementById('cust-email').value;
      const address = document.getElementById('cust-address').value;
      const message = document.getElementById('message-box').value;
      
      // JANGAN LUPA: Ganti nomor di bawah ini dengan nomor WA tokomu sendiri!
      const adminWhatsAppNumber = "6281325463214"; 
      
      const textOutput = `Nama Pembeli: ${name}\nWA: ${phone}\nEmail: ${email}\nAlamat Kirim: ${address}\n\nPesan/Orderan:\n${message}`;
      const url = `https://api.whatsapp.com/send?phone=${adminWhatsAppNumber}&text=${encodeURIComponent(textOutput)}`;
      
      window.open(url, '_blank');
    }
  </script>
</body>
</html>