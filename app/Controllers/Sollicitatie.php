<?php
    class Sollicitatie extends BaseController 
    {
        private int $delay = 2;
        private string $infoMessage = '';

        private readonly mixed $SollicitatieModel;

        public function __construct() 
        {
            $this->SollicitatieModel = $this->model('SollicitatieModel');
        }
		
        /**
         * Display all Sollicitaties on index Sollicitatie view.
         * @return void
         */
		public function index()
		{
            if($_SERVER['REQUEST_METHOD'] == 'GET')
            {
                // Fetch all Sollicitaties from Sollicitatie model.
                $Sollicitaties = $this->SollicitatieModel->getSollicitatiesUseSpMySql();

                // Fetch all Sollicitaties from Sollicitatie model use SP.
                // $Sollicitaties = $this->SollicitatieModel->getSollicitatiesUseSpSqlServer();

                // Assign the result data from model to local variable.
                $data = ['Sollicitaties' => $Sollicitaties];

                // Send the data to view Sollicitatie/index.
                $this->view('Sollicitatie/index', $data);
            }
		}

        /**
         * Display the selected Sollicitatie on details Sollicitatie view.
         * @param integer $id
         * @return void
         */
        public function details(int $id)
        {
            if($_SERVER['REQUEST_METHOD'] == 'GET')
            {
                // Fetch selected Sollicitatie by Id from Sollicitatie model.
                $data = $this->SollicitatieModel->getSollicitatieByIdUseSPMySql($id);

                // $data = $this->SollicitatieModel->getSollicitatieByIdUseSPSqlServer($id);

                // Send the selected Sollicitatie to view Sollicitatie/details.
                $this->view('Sollicitatie/details', $data);
            }
        }

        /**
         * Display the selected Sollicitatie on update Sollicitatie view.
         * @param integer $id
         * @return void
         */
        public function update(int $id)
{
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        // Get the selected Sollicitatie row from the database by Id.
        $modifiedSollicitatie = $this->SollicitatieModel->getSollicitatieByIdUseSPMySql($id);
        // $modifiedSollicitatie = $this->SollicitatieModel->getSollicitatieByIdUseSPSqlServer($id);

        // Map the selected Sollicitatie row to an object.
        $data = SollicitatieHelper::mapSollicitatieRowToObject($modifiedSollicitatie);

        // Send the modified Sollicitatie object to the Sollicitatie/update view.
        $this->view('Sollicitatie/update', $data);
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $_POST = filter_input_array(INPUT_POST);

        // Get the input values of the modified Sollicitatie fields from the update view.
        $data = SollicitatieHelper::setInputSollicitatieFieldsToSollicitatieObject($_POST, 'update');

        // Validate all the input fields of the update method.
        $isViewValid = SollicitatieValidator::validateSollicitatieInputFields($data);

        // Check whether the update view is valid.
        if ($isViewValid && $this->SollicitatieModel->updateSollicitatieUseSPMySql($data)) {
            // Display an info message on the company index view.
            $this->infoMessage = FormatTextHelper::GetInfoMessage("Selected Sollicitatie has been modified", EnumTypeMessage::Success);

            // Redirect to the index Sollicitatie view. 
            header("refresh:$this->delay; url=" . URLROOT  . '/Sollicitatie/index' . $this->infoMessage);
        } else {
            // Display an info message on the Sollicitatie update view.
            $this->infoMessage = FormatTextHelper::GetInfoMessage("Selected Sollicitatie has not been modified", EnumTypeMessage::Error);

            // Redirect to the update Sollicitatie view. 
            header("refresh:$this->delay; url=" . URLROOT  . '/Sollicitatie/update' . $this->infoMessage);

            // Stay in the update Sollicitatie view.
            $this->view('Sollicitatie/update', $data);
        }
    }
}

/**
 * Create a new Sollicitatie from the create Sollicitatie view.
 * @return void
 */
public function create()
{
    // Create a new empty Sollicitatie object for the create view.
    $data = SollicitatieHelper::createEmptySollicitatieObject();

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $this->view('Sollicitatie/create', $data);
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $_POST = filter_input_array(INPUT_POST);

        // Get the input values of the created Sollicitatie fields from the create view.
        $data = SollicitatieHelper::setInputSollicitatieFieldsToSollicitatieObject($_POST, 'create');

        // Validate all the input fields of the create method.
        $isViewValid = SollicitatieValidator::validateSollicitatieInputFields($data);

        // Check whether the create view is valid.
        if ($isViewValid && $this->SollicitatieModel->createSollicitatieUseSPMySql($data)) {
            // Display an info message on the Sollicitatie index view.
            $this->infoMessage = FormatTextHelper::GetInfoMessage("New Sollicitatie has been created", EnumTypeMessage::Success);

            // Redirect to the index Sollicitatie view. 
            header("refresh:$this->delay; url=" . URLROOT  . '/Sollicitatie/index' . $this->infoMessage);
        } else {
            // Display an error message on the Sollicitatie create view.
            $this->infoMessage = FormatTextHelper::GetInfoMessage("New Sollicitatie has not been created", EnumTypeMessage::Error);

            // Redirect to the create Sollicitatie view. 
            header("refresh:$this->delay; url=" . URLROOT  . '/Sollicitatie/create' . $this->infoMessage);

            // Stay in the create Sollicitatie view.
            $this->view('Sollicitatie/create', $data);
        }
    }
}

        /**
         * Delete selected Sollicitatie from index Sollicitatie view.
         * @param integer $id
         * @return void
         */
        public function delete(int $id) 
        {
            // Check whether the delete request has been processed.
            if($this->SollicitatieModel->deleteSollicitatieUseSPMySql($id))
            //if($this->SollicitatieModel->deleteSollicitatieUseSPSqlServer($id))
            {
                // Display een info message on Sollicitatie index view.
                $this->infoMessage = FormatTextHelper::GetInfoMessage("Selected Sollicitatie has been deleted", EnumTypeMessage::Success);

                // Redirect to the index Sollicitatie view. 
                header("refresh:$this->delay; url=" . URLROOT  . '/Sollicitatie/index' . $this->infoMessage);
            }
            else 
            {
                // Display een error message on Sollicitatie index view.
                $this->infoMessage = FormatTextHelper::GetInfoMessage("Selected Sollicitatie has been not deleted", EnumTypeMessage::Error);

                // Redirect to the index Sollicitatie view. 
                header("refresh:$this->delay; url=" . URLROOT  . '/Sollicitatie/index' . $this->infoMessage);

                // Stay in the index Sollicitatie view.
                $this->view('Sollicitatie/index');
            }
        }
    }
?>