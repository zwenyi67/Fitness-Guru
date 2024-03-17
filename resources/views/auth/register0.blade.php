<x-layout>



    <div style="height: 100%; min-height: 90vh;" class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
                <h1> REGISTRATION FORM</h1>
                @livewire('multi-step-form')
            </div>
        </div>
    </div>



    <script>
        /* 
            <div class="input-group">
                                                <input type="file" class="form-control" name="body_images"
                                                id="body_images">
                                                <button class="btn btn-primary" onclick="addInput()"> + </button>
                                            </div>

                                            <div id="input-group" class="input-group mt-3">
                                                <!-- Inputs will be dynamically added here -->
                                            </div>
            
            
            let inputCount = 0;

    function addInput() {

        if (inputCount < 6) {
        inputCount++;

        const inputContainer = document.getElementById('input-group');

        const inputDiv = document.createElement('div');
        inputDiv.classList.add('input-group');

        const input = document.createElement('input');
        input.classList.add('form-control', 'mt-3')
        input.type = 'file';
        input.name = 'dynamicInput' + inputCount;

        const removeButton = document.createElement('button');
        removeButton.classList.add('btn', 'btn-danger')
        removeButton.textContent = ' - ';
        removeButton.onclick = function () {
            inputContainer.removeChild(inputDiv);
        };

        inputDiv.appendChild(input);
        inputDiv.appendChild(removeButton);

        inputContainer.appendChild(inputDiv);
    }
    } */
    </script>



</x-layout>
