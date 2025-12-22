import { Phone, Mail, Clock } from "lucide-react";

const UtilityBar = () => {
  return (
    <div className="bg-primary text-primary-foreground text-sm py-2">
      <div className="container-site flex flex-col sm:flex-row items-center justify-between gap-2">
        <div className="flex items-center gap-6">
          <a 
            href="tel:1-800-KIDAZZLE" 
            className="flex items-center gap-2 hover:text-secondary transition-colors"
          >
            <Phone className="h-4 w-4" />
            <span>1-800-KIDAZZLE</span>
          </a>
          <a 
            href="mailto:hello@kidazzle.com" 
            className="hidden sm:flex items-center gap-2 hover:text-secondary transition-colors"
          >
            <Mail className="h-4 w-4" />
            <span>hello@kidazzle.com</span>
          </a>
        </div>
        <div className="flex items-center gap-4">
          <div className="flex items-center gap-2 text-primary-foreground/80">
            <Clock className="h-4 w-4" />
            <span>Mon-Fri: 6:30am - 6:30pm</span>
          </div>
          <a 
            href="#parent-portal" 
            className="hidden md:inline-block text-secondary hover:text-secondary/80 font-medium transition-colors"
          >
            Parent Portal
          </a>
        </div>
      </div>
    </div>
  );
};

export default UtilityBar;