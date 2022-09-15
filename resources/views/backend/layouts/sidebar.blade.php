<div class="main-menu">
	<header class="header">
		<a href="{{route('admin')}}" class="logo">MS Para</a>
		<button type="button" class="button-close fa fa-times js__menu_close"></button>
	</header>

	<div class="content">
		<div class="navigation">
			<ul class="menu js__accordion">
				<li class="current">
					<a class="waves-effect" href="{{route('admin')}}"><i class="menu-icon mdi mdi-view-dashboard"></i><span>Tableau de bord</span></a>
				</li>

                <li>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fa fa-user"></i><span>Gestion des admins </span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li><a href="{{route('user.index')}}">Tous admins</a></li>
						<li><a href="{{route('user.create')}}">Ajouter admin</a></li>
					</ul>
				</li>

                <li>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fa fa-image"></i><span>Gestion des bannières </span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li><a href="{{route('banner.index')}}">Tous bannières</a></li>
						<li><a href="{{route('banner.create')}}">Ajouter bannière</a></li>
					</ul>
				</li>

                <li>
					<a class="waves-effect" href="{{route('devis.index')}}"><i class="menu-icon fa fa-usd "></i><span>Commandes</span><span class="notice notice-danger">{{\App\Models\Checkout::count()}}</span></a>
				</li>

                <li>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fa fa-shopping-cart"></i><span>Gestion des produits</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li><a href="{{route('product.index')}}">Tous produits</a></li>
						<li><a href="{{route('product.create')}}">Ajouter produit</a></li>
					</ul>
				</li>

                <li>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fa fa-asterisk"  style="font-size: 40px;" ></i><span>Grands catégories </span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li><a href="{{route('grand-category.index')}}">Tous grands catégories</a></li>
						<li><a href="{{route('grand-category.create')}}">Ajouter grand catégorie</a></li>
					</ul>
				</li>


                <li>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fa fa-asterisk" style="font-size: 30px;" ></i><span>Sous catégories </span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li><a href="{{route('category.index')}}">Tous sous catégories</a></li>
						<li><a href="{{route('category.create')}}">Ajouter sous catégorie</a></li>
					</ul>
				</li>


                <li>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fa fa-asterisk " style="font-size: 20px;"></i><span>Sous sous-catégories </span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li><a href="{{route('souscategory.index')}}">Tous sous sous-catégories</a></li>
						<li><a href="{{route('souscategory.create')}}">Ajouter sous sous-catégories</a></li>
					</ul>
				</li>

                <li>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon mdi mdi-newspaper"></i><span>Gestion d'articles</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li><a href="{{route('actualite.index')}}">Tous articles</a></li>
						<li><a href="{{route('actualite.create')}}">Ajouter article</a></li>
					</ul>
				</li>
                <li>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fas fa-award"></i><span>Gestion des marques</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li><a href="{{route('partenaire.index')}}">Tous nos marques</a></li>
						<li><a href="{{route('partenaire.create')}}">Ajouter marque</a></li>
					</ul>
				</li>
                <li>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fas fa-bullhorn"></i><span>Gestion des témoignages</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li><a href="{{route('feedback.index')}}">Tous témoignages</a></li>
						<li><a href="{{route('feedback.create')}}">Ajouter témoignage</a></li>
					</ul>
				</li>

                <li>
					<a class="waves-effect" href="{{route('about.index')}}"><i class="menu-icon mdi mdi-settings"></i><span>à propos</span></a>
                </li>


                <li>
					<a class="waves-effect" href="{{route('contacts.index')}}"><i class="menu-icon fa fa-envelope"></i><span>Messages</span><span class="notice notice-danger" style="background: rgb(79, 96, 248);" >{{\App\Models\Contact::count()}}</span></a>
                </li>

                <li>
					<a class="waves-effect" href="{{route('newsletter.index')}}"><i class="menu-icon fa fa-newspaper-o"></i><span>NewsLetter</span><span class="notice notice-danger" style="background: rgb(37, 37, 37);">{{\App\Models\NewsLetter::count()}}</span></a>
                </li>



			</ul>
		</div>
	</div>
</div>
