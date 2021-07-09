import React , { useState } from 'react';
import ReactDOM from 'react-dom';

function Example2() {
    
    // Declare a new state variable, which we'll call "count"
    const [count, setCount] = useState(0);

    return (
        <div className="container">
            <div className="row justify-content-center">
                <div className="col-md-8">
                    <div className="card">
                        <div className="card-header">Example Component</div>

                        <div className="card-body">
                            I'm an example 2 components!
                            <div>
                                <p>You clicked {count} times</p>
                                <button onClick={() => setCount(count + 1)}>
                                    Click me
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    );
}

export default Example2;

if (document.getElementById('example2')) {
    ReactDOM.render(<Example2 />, document.getElementById('example2'));
}
