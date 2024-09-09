document.getElementById('profile-form').addEventListener('submit', function(event) {
    event.preventDefault();
    
    // Retrieve CV file
    const cvFile = document.getElementById('cv').files[0];
    
    // Retrieve Certificates files
    const certificatesFiles = document.getElementById('certificates').files;
    
    // Create FormData object to store files
    const formData = new FormData();
    
    // Append CV file to formData
    formData.append('cv', cvFile);
    
    // Append each certificate file to formData
    for (let i = 0; i < certificatesFiles.length; i++) {
        formData.append('certificates[]', certificatesFiles[i]);
    }
    
    // Send formData to server using fetch API
    fetch('submit-profile', {
        method: 'POST',
        body: formData
    })
    .then(response => {
        if (response.ok) {
            return response.json();
        }
        throw new Error('Network response was not ok.');
    })
    .then(data => {
        console.log('Response from server:', data);
        // Optionally, you can handle the server response here
    })
    .catch(error => {
        console.error('There was a problem with the fetch operation:', error);
        // Optionally, you can handle errors here
    });
});
