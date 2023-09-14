<style>
    .container {
      display: flex;
      flex-direction: column;
      height: 100vh;
    }
    
    .formulario {
     border-color: black;
     border-width: 20px;
      display: flex;
      flex-wrap: wrap;
      max-width: 600px;
    }
    
    .form-group {
      display: flex;
      flex-basis: 100%;
      margin-bottom: 5px;
    }
    
    .form-group label {
      flex-basis: 37%;
      margin-right: 10px;
    }
    
    .form-group input,
    .form-group select,
    .form-group textarea {
      flex-basis: 70%;
      padding: 5px;
    }
    
    .form-group.full-width label {
      flex-basis: 100%;
    }
    
    .form-group.submit-button {
      align-self: flex-end;
    }
  </style>