require 'mail'
File.open('yourfile.txt', 'w') { |file| file.write("Argument:writing...") }
ARGV.each do|a|
File.open('yourfile.txt', 'w') { |file| file.write("Argument: #{a}") }
end if ARGV.any?

first_name = ARGV[0]
last_name = ARGV[1]
from = ARGV[2]
phone_number = ARGV[3]
message = ARGV[4]

mail_body = "<h4>From: "+ from +"</h4><h4>First Name: "+ first_name +"</h4><h4>Last Name: "+ last_name +"</h4><h4>Phone Number: "+ phone_number +"</h4><h4>Message: "+ message +"</h4>"

delivery_options = { 
                     host: 'http://localhost:3000',
                     domain: 'localhost:3000',
                     password: 'Zeeshan@pk321',
                     address: "smtp.gmail.com",
                     port: 587,
                     authentication: :login,
                     user_name: 'therapidcure',
                     from: "Admin <therapidcure@gmail.com>" }



Mail.defaults do
  delivery_method :smtp, delivery_options
end

mail = Mail.new do
  content_type 'text/html; charset=UTF-8'
            to 'shoaibanjam@gmail.com'
          from "Admin - TRC <therapidcure@gmail.com>"
       subject 'Contact Form submitted! | TheRapidCure'
          body mail_body
end
mail.deliver!
