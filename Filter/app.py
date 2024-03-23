from flask import Flask, render_template, request, jsonify
import joblib
import numpy as np
from flask_cors import CORS

app = Flask(__name__)
CORS(app)
# Load the trained model
model = joblib.load('grievance_classifier_model.joblib')

# Load the TF-IDF vectorizer
vectorizer = joblib.load('tfidf_vectorizer.joblib')

@app.route('/index')
def home():
    return render_template('index.html')

@app.route('/', methods=['POST'])
def submit_grievance():
    if request.method == 'POST':
        # Get the grievance text from the form
        grievance_text = request.form['grievance_text']

        # Vectorize the input text
        grievance_text_vectorized = vectorizer.transform([grievance_text])

        # Make prediction
        urgency = model.predict(grievance_text_vectorized)[0]
        print(urgency)
        # Return the result as JSON
        return str(urgency)

if __name__ == '__main__':
    app.run(debug=True)