import { Link } from "react-router-dom";
import { Button } from "@/components/ui/button";
import { ArrowRight, Calendar } from "lucide-react";

const CTASection = () => {
  return (
    <section className="relative overflow-hidden bg-primary py-20 md:py-28">
      {/* Background Pattern */}
      <div className="absolute inset-0">
        <div className="absolute top-0 left-1/4 w-96 h-96 bg-primary-light/20 rounded-full blur-3xl" />
        <div className="absolute bottom-0 right-1/4 w-80 h-80 bg-secondary/20 rounded-full blur-3xl" />
      </div>

      <div className="container-site relative">
        <div className="max-w-3xl mx-auto text-center">
          <h2 className="text-3xl md:text-4xl lg:text-5xl font-bold text-primary-foreground mb-6">
            Ready to See the{" "}
            <span className="text-secondary">KIDazzle</span> Difference?
          </h2>
          <p className="text-lg md:text-xl text-primary-foreground/80 mb-10 max-w-2xl mx-auto">
            Schedule a tour today and discover why families trust us with their most precious treasures. We can't wait to meet you!
          </p>
          
          <div className="flex flex-col sm:flex-row gap-4 justify-center">
            <Button asChild size="lg" className="btn-secondary rounded-full text-base px-8 shadow-glow">
              <Link to="/contact">
                <Calendar className="mr-2 h-5 w-5" />
                Schedule a Tour
              </Link>
            </Button>
            <Button asChild variant="outline" size="lg" className="rounded-full text-base px-8 border-primary-foreground/30 text-primary-foreground hover:bg-primary-foreground/10">
              <Link to="/locations">
                Find a Location
                <ArrowRight className="ml-2 h-5 w-5" />
              </Link>
            </Button>
          </div>

          {/* Trust badges */}
          <div className="mt-12 flex flex-wrap justify-center gap-8 text-primary-foreground/60 text-sm">
            <span>✓ Free Tour</span>
            <span>✓ No Waitlist Fees</span>
            <span>✓ Flexible Scheduling</span>
          </div>
        </div>
      </div>
    </section>
  );
};

export default CTASection;