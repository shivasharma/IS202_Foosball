
from diagrams import Cluster, Diagram
from diagrams.aws.compute import ECS
from diagrams.aws.database import RDS
from diagrams.aws.network import Route53
from diagrams.onprem.database import MySQL
from diagrams.onprem.compute import Server
from diagrams.programming.framework import Angular
from diagrams.programming.language import Java
with Diagram("Simple Web Service with DB Cluster", show=False):
    dns = Route53("dns")
    web = ECS("service")

    with Cluster("DB Cluster"):
        db_primary = RDS("primary")
        db_primary - [RDS("replica1"),
                     RDS("replica2")]

    dns >> web >> db_primary


    with Cluster("Frontend"):
        servers=[ 
             Server("server1"),
             Server("server2")
             ]
        angular= Angular("Angular")
        java= Java("Java")
    servers >>angular>>java >> MySQL("MySQL")
