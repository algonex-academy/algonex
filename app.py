from flask import Flask, render_template, request
import mysql.connector

app = Flask(__name__)

# Configure MySQL connection
db = mysql.connector.connect(
    host="bobby2508.mysql.pythonanywhere-services.com",  # Your PythonAnywhere MySQL host
    user="bobby2508",  # Your PythonAnywhere MySQL username
    password="Qwertyuiop@2002",  # Replace with your actual password
    database="bobby2508$algonex_db"  # Use the full database name with your username prefix
)
cursor = db.cursor()

@app.route("/", methods=["GET", "POST"])
def register():
    if request.method == "POST":
        name = request.form["name"]
        education = request.form["education"]
        phone = request.form["phone"]
        email = request.form["email"]
        location = request.form["location"]
        course = request.form["course"]
        message = request.form["message"]

        query = """
        INSERT INTO registrations (name, education, phone, email, location, course, message)
        VALUES (%s, %s, %s, %s, %s, %s, %s)
        """
        cursor.execute(query, (name, education, phone, email, location, course, message))
        db.commit()

        return "Registration Successful!"

    return render_template("form.html")

if __name__ == "__main__":
    app.run(debug=True)
