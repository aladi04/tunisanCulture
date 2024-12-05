<?php 
class Aspects extends Controller {

    public function __construct() {
        $this->aspectModel = $this->model('Aspect');
     
    }

    public function index() {
        $aspects = $this->aspectModel->getAspects();
        $data = [
            'aspects' => $aspects
        ];

        $this->view('aspects/index', $data);
    }

    // Add new aspect
    public function add() {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'nom_aspect' => trim($_POST['nom_aspect']),
                'categorie' => trim($_POST['categorie']),
                'description_aspect' => trim($_POST['description_aspect']),
                'image_aspect' => trim($_POST['image_aspect']),
                'nom_aspect_err' => '',
                'categorie_err' => '',
                'description_aspect_err' => ''
            ];

            if (empty($data['nom_aspect'])) {
                $data['nom_aspect_err'] = 'Please enter the aspect name';
            }
            if (empty($data['categorie'])) {
                $data['categorie_err'] = 'Please select a category';
            }            
            if (empty($data['description_aspect'])) {
                $data['description_aspect_err'] = 'Please enter a description';
            }

            if (empty($data['nom_aspect_err']) && empty($data['categorie_err']) && empty($data['description_aspect_err'])) {
                if ($this->aspectModel->addAspect($data)) {
                    flash('aspect_message', 'Your aspect has been added');
                    redirect('aspects');
                } else {
                    die('Something went wrong');
                }
            } else {
                $this->view('aspects/add', $data);
            }
        } else {
            $data = [
                'nom_aspect' => '',
                'categorie' => '',
                'description_aspect' => ''
            ];

            $this->view('aspects/add', $data);
        }
    }

    // Show single aspect
    public function show($id) {
        $aspect = $this->aspectModel->getAspectById($id);
        

        $data = [
            'aspect' => $aspect,
            
        ];

        $this->view('aspects/show', $data);
    }

    // Edit aspect
    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'id_aspect' => $id,
                'nom_aspect' => trim($_POST['nom_aspect']),
                'categorie' => trim($_POST['categorie']),
                'description_aspect' => trim($_POST['description_aspect']),
                'nom_aspect_err' => '',
                'categorie_err' => '',
                'description_aspect_err' => ''
            ];

            if (empty($data['nom_aspect'])) {
                $data['nom_aspect_err'] = 'Please enter the aspect name';
            }
            if (empty($data['categorie'])) {
                $data['categorie_err'] = 'Please enter the category';
            }
            if (empty($data['description_aspect'])) {
                $data['description_aspect_err'] = 'Please enter a description';
            }

            if (empty($data['nom_aspect_err']) && empty($data['categorie_err']) && empty($data['description_aspect_err'])) {
                if ($this->aspectModel->updateAspect($data)) {
                    flash('aspect_message', 'Your aspect has been updated');
                    redirect('aspects');
                } else {
                    die('Something went wrong');
                }
            } else {
                $this->view('aspects/edit', $data);
            }
        } else {
            $aspect = $this->aspectModel->getAspectById($id);
        
            $data = [
                'id' => $id,
                'nom_aspect' => $aspect->nom_aspect,
                'categorie' => $aspect->categorie,
                'description_aspect' => $aspect->description_aspect
            ];

            $this->view('aspects/edit', $data);
        }
    }

    // Delete aspect
    public function delete($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $aspect = $this->aspectModel->getAspectById($id);
          

            if ($this->aspectModel->deleteAspect($id)) {
                flash('aspect_message', 'Aspect Removed');
                redirect('aspects');
            } else {
                die('Something went wrong');
            }
        } else {
            redirect('aspects');
        }
    }
}
?>