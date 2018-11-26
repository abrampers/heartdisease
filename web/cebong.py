from flask import Flask, request
import json
import re

app = Flask(__name__)

@app.route('/', methods=['POST'])
def main():
    """
    main program 
    """
    body = dict(request.form)
    print(body)

    print()
    print('ece cuy ' + body['ecg'][0])

    return json.dumps("Hasil")

if __name__ == '__main__':
    app.run(debug=True)