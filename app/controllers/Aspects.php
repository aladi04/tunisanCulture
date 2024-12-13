<?php 
class Aspects extends Controller {

    public function __construct() {
        $this->aspectModel = $this->model('Aspect');
     
    }

    public function index() {
        // Récupère la page actuelle et le terme de recherche
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $searchTerm = isset($_GET['search']) ? $_GET['search'] : '';
    
        $perPage = 3;  // Nombre d'éléments par page
    
        // Si un terme de recherche est fourni, effectuez la recherche avec pagination
        if ($searchTerm) {
            $aspects = $this->aspectModel->searchAspects($searchTerm, $page, $perPage);
            $totalAspects = $this->aspectModel->countSearchResults($searchTerm);
        } else {
            // Si pas de recherche, récupère tous les aspects avec pagination
            $aspects = $this->aspectModel->getAspects($page, $perPage);
            $totalAspects = $this->aspectModel->getTotalAspects();
        }
    
        // Calculer le nombre total de pages
        $totalPages = ceil($totalAspects / $perPage);
    
        // Données à passer à la vue
        $data = [
            'aspects' => $aspects,
            'currentPage' => $page,
            'totalPages' => $totalPages,
            'searchTerm' => $searchTerm  // Ajoutez le terme de recherche dans les données
        ];
    
        // Chargement de la vue
        $this->view('aspects/index', $data);
    }
    
    
    
    
    
  

    // Show single aspect
    public function show($id) {
        $aspect = $this->aspectModel->getAspectById($id);
        

        $data = [
            'aspect' => $aspect,
            
        ];

        $this->view('aspects/show', $data);
    }

   
  
    public function search(){
        // Vérification de la requête GET pour le terme de recherche
        if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['searchTerm'])){
            // Nettoyer la saisie de l'utilisateur
            $searchTerm = trim($_GET['searchTerm']);
            
            // Recherche d'événements par nom ou description
            $events = $this->eventModel->searchEvents($searchTerm);
            
            $data = [
                'events' => $events,
                'searchTerm' => $searchTerm
            ];
            
            $this->view('aspects/index', $data);
        } else {
            // Rediriger vers la page d'index si aucune recherche n'est effectuée
            $this->index();
        }
    }
    
    
    
}
?>