
# diagram.py
from diagrams import Cluster, Diagram
from diagrams.programming.framework import Angular
from diagrams.programming.language import Java
from diagrams.onprem.database import MySQL
from diagrams.onprem.compute import Server

with Diagram("Frontend", show=False):
     Angular("Angular") >>Java("Java") >> MySQL("MySQL")
     Angular("Angular") << Java("Java") << MySQL("MySQL")

