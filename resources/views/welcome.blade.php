@extends('layouts.app')

@section('content')
 <!-- Banner -->
 <div class="banner">
        <h1>Encontre Eventos esportivos perto de Você!</h1>
        <p>Explore eventos esportivos, recreativos e muito mais.</p>
        <!-- Barra de Busca -->
        <div class="input-box">
    
            <input type="text" placeholder="Buscar eventos..." />        
            <button class="button">Buscar</button>
        </div>
    </div>

<div class="event-cards">
    <!-- Primeira linha de eventos -->
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            <div class="card h-100">
                <img src="https://s2-ge.glbimg.com/J8H7bh_WqnW5CdWMgT8XMsr4jRM=/0x0:1024x1024/984x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_bc8228b6673f488aa253bbcb03c80ec5/internal_photos/bs/2024/B/U/1DZTiqSrAHWEztOS4Q5A/d9ec0414-0eed-419c-9ce3-ea5e8c1b8975.jpg" alt="Evento 1" class="card-img-top">
                <div class="card-body">
                    <h3 class="card-title">Seletiva Municipal de Badminton</h3>
                    <p class="card-text"><i class="bi bi-calendar-event me-2"></i>Data: 15 de Novembro, 2023</p>
                    <p class="card-text"><i class="bi bi-geo-alt me-2"></i>Local: Rio Branco, Acre</p>
                    <a href="#" class="btn-details btn btn-primary">Detalhes</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <img src="https://i.ytimg.com/vi/H5pUwV5vl2s/maxresdefault.jpg" alt="Evento 2" class="card-img-top">
                <div class="card-body">
                    <h3 class="card-title">Festival de Música</h3>
                    <p class="card-text"><i class="bi bi-calendar-event me-2"></i>Data: 20 de Dezembro, 2023</p>
                    <p class="card-text"><i class="bi bi-geo-alt me-2"></i>Local: Rio Branco, Acre</p>
                    <a href="#" class="btn-details btn btn-primary">Detalhes</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <img src="https://i.ytimg.com/vi/LGapP0ASLX4/hq720.jpg?sqp=-oaymwEhCK4FEIIDSFryq4qpAxMIARUAAAAAGAElAADIQj0AgKJD&rs=AOn4CLD7eXlBG2RuwB26M7TXkTdUTktGgA" alt="Evento 3" class="card-img-top">
                <div class="card-body">
                    <h3 class="card-title">Seletiva de Ginástica</h3>
                    <p class="card-text"><i class="bi bi-calendar-event me-2"></i>Data: 5 de Janeiro, 2024</p>
                    <p class="card-text"><i class="bi bi-geo-alt me-2"></i>Local: Rio Branco, Acre</p>
                    <a href="#" class="btn-details btn btn-primary">Detalhes</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Segunda linha de eventos -->
    <div class="row row-cols-1 row-cols-md-3 g-4 mt-4">
        <div class="col">
            <div class="card h-100">
                <img src="https://img.cdndsgni.com/preview/10267819.jpg" alt="Evento 4" class="card-img-top">
                <div class="card-body">
                    <h3 class="card-title">Hackathon Global</h3>
                    <p class="card-text"><i class="bi bi-calendar-event me-2"></i>Data: 10 de Fevereiro, 2024</p>
                    <p class="card-text"><i class="bi bi-globe me-2"></i>Local: Online</p>
                    <a href="#" class="btn-details btn btn-primary">Detalhes</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <img src="https://img.cdndsgni.com/preview/10267819.jpg" alt="Evento 5" class="card-img-top">
                <div class="card-body">
                    <h3 class="card-title">Semana de Negócios</h3>
                    <p class="card-text"><i class="bi bi-calendar-event me-2"></i>Data: 15 de Março, 2024</p>
                    <p class="card-text"><i class="bi bi-geo-alt me-2"></i>Local: Florianópolis, Brasil</p>
                    <a href="#" class="btn-details btn btn-primary">Detalhes</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <img src="https://img.cdndsgni.com/preview/10267819.jpg" alt="Evento 6" class="card-img-top">
                <div class="card-body">
                    <h3 class="card-title">Feira de Artesanato</h3>
                    <p class="card-text"><i class="bi bi-calendar-event me-2"></i>Data: 20 de Abril, 2024</p>
                    <p class="card-text"><i class="bi bi-geo-alt me-2"></i>Local: Salvador, Brasil</p>
                    <a href="#" class="btn-details btn btn-primary">Detalhes</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Rodapé -->
<footer class="footer">
    <div class="container text-center">
        <p>&copy; 2025 Podium. Todos os direitos reservados.</p>
        <div class="social-links">
            <a href="#" class="text-purple me-3"><i class="bi bi-facebook"></i></a>
            <a href="#" class="text-purple me-3"><i class="bi bi-twitter"></i></a>
            <a href="#" class="text-purple me-3"><i class="bi bi-instagram"></i></a>
            <a href="#" class="text-purple"><i class="bi bi-linkedin"></i></a>
        </div>
    </div>
</footer>
@endsection